// Login form
const username = document.getElementById('username');
const password = document.getElementById('password');

const adminLogin = () => {
  username.value = 'admin';
  password.value = '123456';
};

const ownerLogin = () => {
  username.value = 'owner';
  password.value = '123456';
};

const tenantLogin = () => {
  username.value = 'tenant';
  password.value = '123456';
};

const employeeLogin = () => {
  username.value = 'employee';
  password.value = '123456';
};

// Apartment Form
const profileEditButton = document.getElementById('profileEditButton');
const cancelProfileEdit = document.getElementById('cancelProfileEdit');

const profileInfoList = document.getElementById('profileInfoList');
const profileEditForm = document.getElementById('profileEditForm');

const toggleClasses = () => {
  profileInfoList.classList.toggle('d-none');
  profileEditForm.classList.toggle('d-none');
};

profileEditButton.addEventListener('click', () => {
  toggleClasses();
});

cancelProfileEdit.addEventListener('click', () => {
  toggleClasses();
});
