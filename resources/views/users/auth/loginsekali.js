async function loginsekali() {
    const email = document.getElementById('email').value
    const password = document.getElementById('password').value

    await jQuery.ajax({
        url: '/login',
        type: 'POST',
        data: {
            email: email,
            password: password,
            _token: "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function() {

        },
        complete: () => {
            window.location.reload();
        }
    })
}