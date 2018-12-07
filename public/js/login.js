async function login() {
  const email = document.getElementById('email').value
  const password = document.getElementById('password').value

  await jQuery.ajax({
    url: '/login',
    type: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      email: email,
      password: password,
    },
    dataType: 'json',
    success: function () {

    },
    complete: () => {
      window.location.reload();
    }
  })
}
