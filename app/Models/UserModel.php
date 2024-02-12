<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'user';

    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['username', 'email', 'password', 'registration_date', 'last_login', 'first_name', 'last_name', 'avatar', 'country', 'city', 'admin'];

    public function insertUser($postData) {
        $postData['registration_date'] = date('Y-m-d');
        $postData['avatar'] = base_url('uploads/avatar/default'.strtoupper($postData['username'][0]).'.jpg');
        $postData['password'] = password_hash($postData['password'], PASSWORD_BCRYPT);
        return $this->insert($postData);
    }

    public function connect($postData) {
        $user = $this->where('email', $postData['email'])->get()->getRowArray();
        if ($user) {
            if (!password_verify($postData['password'], $user['password'])) {
                $user = false;
                return 'Password is not correct.';
            } else {
                $this->update($user['id_user'], ['last_login' => date('Y-m-d')]);
                return $user;
            }
        } else {
            return 'Email doesn\'t exist.';
        }
    }

    public function getUserData($username) {
        return $this->where('username', $username)->get()->getRowArray();
    }

    public function updateUser($postData) {
        $user = $this->where('username', session('login'))->get()->getRowArray();

        $data = [
            'first_name' => !empty($postData['first_name'])?$postData['first_name']:NULL,
            'last_name' => !empty($postData['last_name'])?$postData['last_name']:NULL,
            'country' => !empty($postData['country'])?$postData['country']:NULL,
            'city' => !empty($postData['city'])?$postData['city']:NULL,
            'avatar' => !empty($postData['avatar'])?$postData['avatar']:$user['avatar']
        ];

        $this->update($user['id_user'], $data);

        return $this->where('username', session('login'))->get()->getRowArray();

    }


    public function updatePassword($postData) {
        $user = $this->where('username', session('login'))->get()->getRowArray();

        if (password_verify($postData['currentPassword'], $user['password'])) {

            if ($postData['currentPassword'] == $postData['newPassword']) {

                return 'Current and new password cannot be the same.';

            } else {

                $data = [
                    'password' => password_hash($postData['newPassword'], PASSWORD_BCRYPT)
                ];
    
                $this->update($user['id_user'], $data);
    
                return $user;

            }

        } else {
            return 'Current password is not correct.';
        }
    }




    public function deleteUser($postData) {
        $user = $this->where('username', session('login'))->get()->getRowArray();

        if ($user['email'] == $postData['email']) {
            if (password_verify($postData['password'], $user['password'])) {

                $this->delete($user['id_user']);

                return $user;

            } else {
                return 'Password is not correct.';
            }

        } else {
            return 'Email is not correct.';
        }

    }

}

