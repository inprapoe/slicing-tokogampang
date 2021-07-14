import $ from "jquery";
import validate from "jquery-validation";
$(document).ready(function() {
    $.validator.addMethod(
        "alphanumeric",
        function(value, element) {
            return this.optional(element) || /^[a-z0-9]+$/.test(value);
        },
        "Hanya Terdiri Dari Huruf Kecil Dan Angka"
    );
    $.validator.addMethod(
        "idphone",
        function(value, element) {
            return (
                this.optional(element) ||
                /^(\+62|62|0)8[1-9][0-9]{6,12}$/.test(value)
            );
        },
        "No Handphone Tidak Valid"
    );
    $("#marketer-register-form").validate({
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            shop_name: { required: true, maxlength: 20 },
            username: {
                required: true,
                alphanumeric: true,
                minlength: 6,
                maxlength: 20
            },
            name: { required: true, maxlength: 50 },
            email: { required: true, email: true },
            phone: { required: true, idphone: true },
            address: { required: true, maxlength: 100 },
            password: { required: true, minlength: 8 },
            password_confirmation: { equalTo: "#input-password-marketer" }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#supplier-register-form").validate({
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            username: {
                required: true,
                alphanumeric: true,
                minlength: 6,
                maxlength: 20
            },
            name: { required: true, maxlength: 50 },
            email: { required: true, email: true },
            phone: { required: true, idphone: true },
            address: { required: true, maxlength: 100 },
            province: { required: true },
            city: { required: true },
            subdistrict: { required: true },
            postal_code: {
                required: true,
                number: true,
                minlength: 5,
                maxlength: 5
            },
            password: { required: true, minlength: 8 },
            password_confirmation: { equalTo: "#input-password-supplier" }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#contact-form").validate({
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            name: { required: true, maxlength: 50 },
            email: { required: true, email: true },
            phone: { idphone: true },
            title: { required: true, maxlength: 20 },
            message: { required: true, maxlength: 255 }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#customer-register-form").validate({
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            username: {
                required: true,
                alphanumeric: true,
                minlength: 6,
                maxlength: 20
            },
            name: { required: true, maxlength: 50 },
            email: { required: true, email: true },
            phone: { required: true, idphone: true },
            address: { required: true, maxlength: 100 },
            province: { required: true },
            city: { required: true },
            subdistrict: { required: true },
            gender: { required: true },
            postal_code: {
                required: true,
                number: true,
                minlength: 5,
                maxlength: 5
            },
            password: { required: true, minlength: 8 },
            password_confirmation: { equalTo: ".input-password" }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#customer-profile-form").validate({
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            username: {
                required: true,
                alphanumeric: true,
                minlength: 6,
                maxlength: 20
            },
            name: { required: true, maxlength: 50 },
            email: { required: true, email: true },
            phone: { required: true, idphone: true },
            address: { required: true, maxlength: 100 }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#address-form").validate({
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            name: { required: true, maxlength: 50 },
            email: { required: true, email: true },
            phone: { required: true, idphone: true },
            address: { required: true, maxlength: 100 },
            province: { required: true },
            city: { required: true },
            subdistrict: { required: true },
            postal_code: {
                required: true,
                number: true,
                minlength: 5,
                maxlength: 5
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
