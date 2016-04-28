<?php



/**
 * Class UserRepository
 *
 * This service abstracts some interactions that occurs between Confide and
 * the Database.
 */
class UserRepository
{
    /**
     * Signup a new account with the given parameters
     *
     * @param  array $input Array containing 'username', 'email' and 'password'.
     *
     * @return  User User object that may or may not be saved successfully. Check the id to make sure.
     */
    public function signup($input)
    {
        $user = new User;

        $user->username = trim(strtolower(array_get($input, 'username')));
        $user->email    = trim(strtolower(array_get($input, 'email')));
        $user->password = array_get($input, 'password');

        // @peenger add the refcamp fields here
        $user->first_name = trim(strtolower(array_get($input, 'first_name')));
        $user->last_name  = trim(strtolower(array_get($input, 'last_name')));
        $user->gender = array_get($input, 'gender');

        //working p but changed

        //$birthday= array_get($input, 'birth_day');
        //$birthyear= array_get($input, 'birth_year');
       // $birthmonth= array_get($input, 'birth_month');

        //$user->birthdate = date('Y-m-d', strtotime($birthday." ".$birthmonth." ". $birthyear));
        $user->birth_year = trim(array_get($input, 'birth_year'));

        $user->state_of_origin = array_get($input, 'state_of_origin');
        $user->state_of_residence  = array_get($input, 'state_of_residence');
        $user->registered_to_vote  = array_get($input, 'registered_to_vote');
        $user->phone = trim(array_get($input, 'phone'));
        //end adding refcamp field items here

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = array_get($input, 'password_confirmation');

        // Generate a random confirmation code
        $user->confirmation_code     = md5(uniqid(mt_rand(), true));

        //@peenger check if this user is signing up as a result of a referral link
        if (isset($input['referred_by'])) {
            $user->referred_by  = array_get($input, 'referred_by');
        }
        /**@peenger this code will probably return an error if no record is found in the database so there must be at least one record set in the database
        $usercount = DB::table('users')->count();
        $currentRecordCount =$usercount+1;
        $alphaPreamble = "ALPHA";
        $divider = $currentRecordCount/3;
        if (is_float($divider)){
            $codePrefix = ceil($divider);
            $constructCode = $alphaPreamble.$codePrefix;
            $user->group_code = $constructCode;

        }
        else {
            $codePrefix = $divider;
            $constructCode = $alphaPreamble.$codePrefix;
            $user->group_code = $constructCode;
        }*/

        // Save if valid. Password field will be hashed before save
        $this->save($user);

        return $user;
    }

    /**
     * Attempts to login with the given credentials.
     *
     * @param  array $input Array containing the credentials (email/username and password)
     *
     * @return  boolean Success?
     */
    public function login($input)
    {
        if (! isset($input['password'])) {
            $input['password'] = null;
        }

        return Confide::logAttempt($input, Config::get('confide::signup_confirm'));
    }

    /**
     * Checks if the credentials has been throttled by too
     * much failed login attempts
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Is throttled
     */
    public function isThrottled($input)
    {
        return Confide::isThrottled($input);
    }

    /**
     * Checks if the given credentials correponds to a user that exists but
     * is not confirmed
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Exists and is not confirmed?
     */
    public function existsButNotConfirmed($input)
    {
        $user = Confide::getUserByEmailOrUsername($input);

        if ($user) {
            $correctPassword = Hash::check(
                isset($input['password']) ? $input['password'] : false,
                $user->password
            );

            return (! $user->confirmed && $correctPassword);
        }
    }

    /**
     * Resets a password of a user. The $input['token'] will tell which user.
     *
     * @param  array $input Array containing 'token', 'password' and 'password_confirmation' keys.
     *
     * @return  boolean Success
     */
    public function resetPassword($input)
    {
        $result = false;
        $user   = Confide::userByResetPasswordToken($input['token']);

        if ($user) {
            $user->password              = $input['password'];
            $user->password_confirmation = $input['password_confirmation'];
            $result = $this->save($user);
        }

        // If result is positive, destroy token
        if ($result) {
            Confide::destroyForgotPasswordToken($input['token']);
        }

        return $result;
    }

    /**
     * Simply saves the given instance
     *
     * @param  User $instance
     *
     * @return  boolean Success
     */
    public function save(User $instance)
    {
        return $instance->save();
    }
}
