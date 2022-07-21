<?php


namespace backend\models;


use common\models\SiteUser;
use yii\base\Model;

class UpdateSiteUser extends Model
{
    public $username;
    public $email;
    public $password;
    public $fio;
    public $phone;
    public $district_id;
    public $structure_id;
    public $rank;
    public $avatar;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'trim'],
            ['password', 'string', 'min' => 6],
            [['district_id','rank'],'integer'],
            ['email','safe']
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'fio' => 'ФИО',
            'phone' => 'Телефон рақам',
            'password' => 'Пароль',
            'avatar' => 'Сурат',
            'district_id' => 'Вилоят',
            'rank' => 'Даража',
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function update($id,$username,$password,$email,$district_id,$rank)
    {
        if (!$this->validate()) {
            return null;
        }


        $user = SiteUser::findOne($id);

        if($username){
            $user->username = $username;
        }

        $user->district_id = $district_id;

        if($email){
            $user->email = $email;
        }

        $user->rank = $rank;

        if($password){
            $user->setPassword($password) ;
        }

        return $user->save() ? $user : null;
    }
}