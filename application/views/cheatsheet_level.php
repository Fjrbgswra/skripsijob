<?php 
#mengambil data user login

#mengambil data siswa
$this->session->userdata('logged_in_user'); //ini null or not
$this->session->userdata('logged_in_user')['id_siswa']; //id_siswa
$this->session->userdata('logged_in_user')['nama']; //ini nama
$this->session->userdata('logged_in_user')['username']; //ini username

#mengambil data admin
$this->session->userdata('logged_in');
$this->session->userdata('logged_in')['id_administrator'];
$this->session->userdata('logged_in')['nama'];
$this->session->userdata('logged_in')['username'];
$this->session->userdata('logged_in')['fk_id_level'];

#melempar user ke login jika (koyok seng lek aku durung login terus aku akses dasboard di tolak)
#hati hati dengan cara pemakaian harus salah satu , np jika memakai yang pakai level (nomor 3 sampe 5) harus ada nomer 2 nya diatas nya (soalnya if nya menggunakan logged_in jadi harus ada dahulu mksdnya harus login dahulu)

#1. jika bukan siswa maka ke login ( pindah halaman login ) / belum login
if ($this->session->userdata('logged_in_user') == null) {
	redirect('Login','refresh');
}
#2. jika bukan admin maka ke login / belum login
if ($this->session->userdata('logged_in') == null) {
	redirect('Login','refresh');
}		
#3. jika hanya boleh admin dengan level 1 saja
if ($this->session->userdata('logged_in')['fk_id_level'] == 1) {
	redirect('Login','refresh');
}
#4. jika hanya boleh admin dengan level 2 saja
if ($this->session->userdata('logged_in')['fk_id_level'] == 2) {
	redirect('Login','refresh');
}
#5. jika hanya boleh admin dengan level 1 dan 2
if ($this->session->userdata('logged_in')['fk_id_level'] == 1 || $this->session->userdata('logged_in')['fk_id_level'] == 2) {
	redirect('Login','refresh');
}

?>

tutorial kalau menghilangkan view
<?php if ($this->session->userdata('logged_in')['fk_id_level'] == 1): ?>
	<a href="">Saya Admin</a>
	<?php else: ?>
		<a href="">Saya Bukan Admin</a>
<?php endif ?>
script diatas akan memunculkan link "saya admin"
digae pas neng menu dashboard kayak gini

<?php if ($this->session->userdata('logged_in') != null): ?>
	<a href="">Saya Sudah Login sebagai admin</a>
	<?php else: ?>
		<a href="">Saya Belum Login</a>
<?php endif ?>

<?php if ($this->session->userdata('logged_in_user') != null): ?>
	<a href="">Saya Sudah Login sebagai siswa</a>
	<?php else: ?>
		<a href="">Saya Belum Login</a>
<?php endif ?>