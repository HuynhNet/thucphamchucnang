require('./bootstrap');
window.Vue = require('vue');

var app = new Vue({
    el: '#loginForm',
    data: {
        email: '',
        password: '',
        errors: [],
        emailValidate: 'pending',
        passwordValidate: 'pending',
        isEmail: null,
        isSubmit: false,
        reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
    },
    methods: {
        validateInput(){
            if(this.email === ''){
                this.emailValidate = 'invalid';
            }else{
                this.emailValidate = 'valid';
            }

            if(this.reg.test(this.email)){
                this.isEmail = true;
            }else{
                this.isEmail = false;
            }

            this.passwordValidate = (this.password === '') ? 'invalid' : 'valid';

        }

    }

});

var register = new Vue({
    el: '#registerForm',
    data: {
        fullname: '',
        username: '',
        email: '',
        password: '',
        re_password: '',
        phone: '',
        birthday: '',
        address: '',
        regEmail: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
        regPhone: /((09|03|07|08|05)+([0-9]{8})\b)/g,
        isEmail: null
    },
    methods: {
        checkEmail(){
            if(this.regEmail.test(this.email)){
                this.isEmail = true;
            }else{
                this.isEmail = false;
            }
        }
    }
})

app.$mount('#app')
