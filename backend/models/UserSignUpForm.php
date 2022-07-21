<?php


namespace backend\models;


use common\models\SiteUser;
use yii\base\Model;

class UserSignUpForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $district_id;
    public $rank;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\SiteUser', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [['email'], 'string', 'max' => 255],
            [['district_id','rank'],'integer'],
            ['email', 'unique', 'targetClass' => '\common\models\SiteUser', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new SiteUser();

        $user->username = $this->username;
        $user->email = $this->email;
        $user->district_id = $this->district_id;

        if(empty($user->district_id)){
            $user->district_id = 0;
        }

        $user->rank = $this->rank;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
