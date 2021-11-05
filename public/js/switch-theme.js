var toggle_icon = document.getElementById('flexSwitchCheckDefault');
var body = document.getElementById('body');
var dark_theme_class = 'dark-theme';
var light_theme_class = 'light-theme';
var currTheme = Cookies.get('theme')
toggle_icon.checked = currTheme === 'dark';

toggle_icon.addEventListener('click', function() {
    if (body.classList.contains(dark_theme_class)) {
        toggle_icon.checked = false
        body.classList.remove(dark_theme_class);
        body.classList.add(light_theme_class);
        setCookie('theme', 'light');
    }
    else {
        toggle_icon.checked = true
        body.classList.remove(light_theme_class);
        body.classList.add(dark_theme_class);
        setCookie('theme', 'dark');
    }
});

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}
