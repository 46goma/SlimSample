<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/../lib/php/Db/Dao/User.php';

class User extends Model
{
    public $id;
    public $name;
    public $password;
    public $salt;
    public $email;
    public $birthday;

    /**
     * ユーザー名を指定してDBからデータを取得してプロパティに設定する
     *
     * @param string $user_name ユーザー名
     * @return boolean ロードが成功した場合true, 失敗した場合false
     */
    public function loadByName($user_name)
    {
        $user_dao = $this->getFactory()->getDb_Dao_User();
        $user_info = $user_dao->findByName($user_name);
        if ($user_info === false) {
            return false;
        }
        $this->id = $user_info['id'];
        $this->name = $user_info['name'];
        $this->password = $user_info['password'];
        $this->salt = $user_info['salt'];
        $this->email = $user_info['email'];
        $this->birthday = $user_info['birthday'];

        return true;
    }

    /**
     * 会員か非会員かを判定する
     *
     * @param string $user_name ユーザー名
     * @return boolean 会員の場合true, 非会員の場合falseを返す
     */
    public function isMember($user_name)
    {
        $user = $this->getFactory()->getDb_Dao_User();
        return $user->countByName($user_name) > 0;
    }

    /**
     * ユーザー登録する
     *
     * @param string $name ユーザー名
     * @param string $password パスワード
     * @param string $salt サルト
     * @param string $email Email
     * @param string $birthday 誕生日
     * @return boolean 処理が成功した場合true, 失敗した場合false
     */
    public function register($user_name, $password, $salt, $email, $birthday)
    {
        $user = $this->getFactory()->getDb_Dao_User();
        return $user->insert($user_name, $password, $salt, $email, $birthday);
    }
}
