<template>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">

                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link :to="'/admin1/index1'"><i class="la la-home"></i> Dashboard
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active"> User Management
                                </li>
                                <li class="breadcrumb-item active"> Add User
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add User</h4>
                                    <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>

                                        </ul>
                                    </div>
                                </div>


                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <div class="form-body">

                                                <h4 class="form-section"><i
                                                    class="ft-home"></i> User Detail </h4>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">School <span
                                                            style="float: right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="school" v-model="school" class="form-control">
                                                            <option value="" disabled selected>Choose The school
                                                            </option>
                                                            <option class="custom-select" value="all">All</option>
                                                            <option class="custom-select" value="american">American
                                                            </option>
                                                            <option class="custom-select" value="british">British
                                                            </option>
                                                            <option class="custom-select" value="company">Company
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Role <span
                                                            style="float: right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="role" v-model="role" class="form-control">
                                                            <option value="" disabled selected>Choose The Role
                                                            </option>
                                                            <option class="custom-select" value="all">All</option>
                                                            <option class="custom-select" value="american">American
                                                            </option>
                                                            <option class="custom-select" value="british">British
                                                            </option>
                                                            <option class="custom-select" value="company">Company
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span>
                                                            First Name <span style="float: right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="first_name"
                                                               v-model="first_name"
                                                               value="">
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span>
                                                            Last Name <span style="float: right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="last_name"
                                                               v-model="last_name"
                                                               value="">
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span>
                                                            Credential <span style="float: right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input type="email"
                                                                       class="form-control"
                                                                       placeholder="enter the email"
                                                                       name="email"
                                                                       v-model="email"
                                                                       value="">
                                                            </div>

                                                        </div>
                                                        <div class="row mt-1">
                                                            <div class="col-lg-12">
                                                                <input type="number"
                                                                       class="form-control"
                                                                       placeholder="enter the mobile"
                                                                       name="mobile"
                                                                       v-model="mobile"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">
                                                            Gender <span style="float: right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <input type="radio" name="female" class="female"
                                                                       id="female" v-model="gender"
                                                                       value="female" required>
                                                                <label style="font-size: 12px;"
                                                                       for="female">Female</label>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <input type="radio" name="male" class="male" id="male"
                                                                       v-model="gender"
                                                                       value="male" required>
                                                                <label style="font-size: 12px;" for="male">Male</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary"
                                                        @click.prevent="store">
                                                    <i class="la la-check-square-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                school: '',
                role: '',
                first_name: '',
                last_name: '',
                email: '',
                mobile: '',
                gender: '',
            }
        },
        mounted() {
            console.log('Component mounted.');

        },
        computed: {
            // isValidForm() {
            //     return this.cashin_new_number.length > 5 && this.cashout_new_number.length > 5 && this.pay_new_number.length > 5 &&
            //         this.pur_new_number.length > 5 && this.journal_new_number.length > 5 && this.inventory_new_number.length > 5;
            //
            // }
        },
        methods: {
            store() {
                let config = {
                    headers: {"content-type": 'multipart/form-data'}
                };
                let formdata = new FormData();
                formdata.append('school', this.school);
                formdata.append('role', this.role);
                formdata.append('first_name', this.first_name);
                formdata.append('last_name', this.last_name);
                formdata.append('email', this.email);
                formdata.append('mobile', this.mobile);
                formdata.append('gender', this.gender);

                axios.post('/api/setting/general_ledger/add_account', formdata, config)
                    .then(res => {
                        console.log(res);

                    })
                    .catch(error => {
                        console.log(error);
                        $('.card').append('<div class="alert alert-danger"><p>' + error + '</p></div>');
                    });

            },

        }
    }
    $(document).ready(function () {
        var checkbox = $('.perm input[type="checkbox"]');
        $("#selectAll").click(function () {
            if (this.checked) {
                checkbox.each(function () {
                    this.checked = true;
                });
            } else {
                checkbox.each(function () {
                    this.checked = false;
                });
            }
        });
        checkbox.click(function () {
            if (!this.checked) {
                $("#selectAll").prop("checked", false);
            }
        });


    });
</script>
