<?php 
class UsersController extends REST_Controller {

public function index()
{
    $data = $this->db->get('m_users')->result();
    $this->response(['success' => true, 'data' => $data]);
}

public function show($id)
{
    $data = $this->db->get_where('m_users', ['id' => $id])->row();
    $this->response(['success' => true, 'data' => $data]);
}

public function save()
{
    //validation
    $error = [];
    if( !$this->getPost('username')) $error[] = 'Username harus diisi';
    if( !$this->getPost('password')) $error[] = 'Password harus diisi';
    if( !$this->getPost('address')) $error[] = 'Alamat harus diisi';

    if( count($error) > 0 )
    {
        $this->response(['success' => false, 'message' => $error[0] ], 422);
    }

    $insert = [
        'username' => $this->getPost('username'),
        'password' => password_hash($this->getPost('password'), PASSWORD_DEFAULT),
        'address' => $this->getPost('address'),
        'phone' => $this->getPost('phone')
    ];
    $this->db->insert('m_users', $insert);

    $this->response(['success' => true, 'message' => 'Berhasil insert user']);
}

public function update($id)
{
    $update = [];

    if( $this->getPost('password') ) $update['password'] = password_hash($this->getPost('password'), PASSWORD_DEFAULT);
    if( $this->getPost('address') ) $update['address'] = $this->getPost('address');
    if( $this->getPost('phone') ) $update['phone'] = $this->getPost('phone');
    
    $this->db->update('m_users', $update, ['id' => $id]);

    $this->response(['success' => true, 'message' => 'Berhasil update user']);
}

public function delete($id)
{
    $this->db->where('id', $id);
    $this->db->delete('m_users');

    $this->response(['success' => true, 'message' => 'Berhasil delete user']);
}

}

