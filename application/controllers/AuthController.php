<?php
class AuthController extends REST_Controller {

public function login()
{
    //validation
    $error = [];
    if( !$this->getPost('username')) $error[] = 'Username harus diisi';
    if( !$this->getPost('password')) $error[] = 'Password harus diisi';

    if( count($error) > 0 )
    {
        $this->response(['success' => false, 'message' => $error[0] ], 422);
    }

    $exist = $this->db->get_where('m_users', ['username' => $this->getPost('username')])->row();
    if( $exist )
    {
        if( password_verify($this->getPost('password'), $exist->password) )
        {
            $data = $this->db->select('username, name, address, phone')->get_where('m_users',['id' => $exist->id])->row();
            $this->response( ['success'=> true, 'data' => $data]);
        }else{

            $this->response( ['success'=> false, 'message' => 'User tidak ditemukan' ] );
        }
    }else{
        $this->response( ['success'=> false, 'message' => 'User tidak ditemukan' ], 404 );
    }
}

}

