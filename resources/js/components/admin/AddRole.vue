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
                                <li class="breadcrumb-item active"> Add Role
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
                                    <h4 class="card-title">Add Role</h4>
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
                                                    class="ft-home"></i> Role Detail </h4>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span> Focus <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="focus" v-model="focus" class="form-control">
                                                            <option value="" disabled selected>Choose Your Focus</option>
                                                            <option class="custom-select" value="all" >All </option>
                                                            <option class="custom-select" value="american" >American</option>
                                                            <option class="custom-select" value="british" >British </option>
                                                            <option class="custom-select" value="company" >Company </option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span> Name <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               style="width: 50%;"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="name"
                                                               v-model="name"
                                                               value="">
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Description <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               style="width: 50%;"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="description"
                                                               v-model="description"
                                                               value="">
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <h5 class="card-title">Permissions</h5>
                                                <div class="nav-vertical" style="margin-left: 30px;">
                                                    <ul class="nav nav-tabs nav-left nav-border-left">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="baseVerticalLeft1-tab1" data-toggle="tab" aria-controls="tabVerticalLeft11"
                                                               href="#tabVerticalLeft11" aria-expanded="true">Settings</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseVerticalLeft1-tab2" data-toggle="tab" aria-controls="tabVerticalLeft12"
                                                               href="#tabVerticalLeft12" aria-expanded="false">Fees</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseVerticalLeft1-tab3" data-toggle="tab" aria-controls="tabVerticalLeft13"
                                                               href="#tabVerticalLeft13" aria-expanded="false">Assets</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseVerticalLeft1-tab4" data-toggle="tab" aria-controls="tabVerticalLeft14"
                                                               href="#tabVerticalLeft14" aria-expanded="false">Assets</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseVerticalLeft1-tab5" data-toggle="tab" aria-controls="tabVerticalLeft15"
                                                               href="#tabVerticalLeft15" aria-expanded="false">Assets</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseVerticalLeft1-tab6" data-toggle="tab" aria-controls="tabVerticalLeft16"
                                                               href="#tabVerticalLeft16" aria-expanded="false">Assets</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseVerticalLeft1-tab7" data-toggle="tab" aria-controls="tabVerticalLeft17"
                                                               href="#tabVerticalLeft17" aria-expanded="false">Assets</a>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content px-1">
                                                        <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft11" aria-expanded="true"
                                                             aria-labelledby="baseVerticalLeft1-tab1">
                                                            <label style="padding-left: 20px;"><input type="checkbox" name="permissions[]" v-model="permissions" id="selectAll"> Select All</label>
                                                            <hr>
                                                            <div class="perm" style="display: grid; padding-left: 35px; ">
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="User_Management" id="selectAll1"> User Management </label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Add_role" id="selectAll2"> Add new role</label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Edit_role" id="selectAll3"> Edit role </label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Delete_role" id="selectAll4"> Delete role </label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Add_user" id="selectAll5"> Add new user</label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Edit_user" id="selectAll6"> Edit user</label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Delete_user" id="selectAll7"> Delete user</label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Access_GlobalSerial" id="selectAll8"> Access to Global Serial </label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Access_JV" id="selectAll9"> Access to JV </label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Access_Budget" id="selectAll10"> Access to Budget</label>
                                                                <label><input type="checkbox" name="permissions[]" v-model="permissions" value="Access_GL" id="selectAll11"> Access to GL</label>
                                                            </div>
                                                            </div>
                                                        <div class="tab-pane" id="tabVerticalLeft12" aria-labelledby="baseVerticalLeft1-tab2">
                                                            <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie
                                                                pastry cotton candy oat cake fruitcake jelly chupa chups.
                                                                Pudding caramels pastry powder cake soufflé wafer caramels.
                                                                Jelly-o pie cupcake.</p>
                                                        </div>
                                                        <div class="tab-pane" id="tabVerticalLeft13" aria-labelledby="baseVerticalLeft1-tab3">
                                                            <p>Biscuit ice cream halvah candy canes bear claw ice cream
                                                                cake chocolate bar donut. Toffee cotton candy liquorice.
                                                                Oat cake lemon drops gingerbread dessert caramels. Sweet
                                                                dessert jujubes powder sweet sesame snaps.</p>
                                                        </div>
                                                        <div class="tab-pane" id="tabVerticalLeft14" aria-labelledby="baseVerticalLeft1-tab4">
                                                            <p>Biscuit ice cream halvah candy canes bear claw ice cream
                                                                cake chocolate bar donut. Toffee cotton candy liquorice.
                                                                Oat cake lemon drops gingerbread dessert caramels. Sweet
                                                                dessert jujubes powder sweet sesame snaps.</p>
                                                        </div>
                                                        <div class="tab-pane" id="tabVerticalLeft15" aria-labelledby="baseVerticalLeft1-tab5">
                                                            <p>Biscuit ice cream halvah candy canes bear claw ice cream
                                                                cake chocolate bar donut. Toffee cotton candy liquorice.
                                                                Oat cake lemon drops gingerbread dessert caramels. Sweet
                                                                dessert jujubes powder sweet sesame snaps.</p>
                                                        </div>
                                                        <div class="tab-pane" id="tabVerticalLeft16" aria-labelledby="baseVerticalLeft1-tab6">
                                                            <p>Biscuit ice cream halvah candy canes bear claw ice cream
                                                                cake chocolate bar donut. Toffee cotton candy liquorice.
                                                                Oat cake lemon drops gingerbread dessert caramels. Sweet
                                                                dessert jujubes powder sweet sesame snaps.</p>
                                                        </div>
                                                        <div class="tab-pane" id="tabVerticalLeft17" aria-labelledby="baseVerticalLeft1-tab7">
                                                            <p>Biscuit ice cream halvah candy canes bear claw ice cream
                                                                cake chocolate bar donut. Toffee cotton candy liquorice.
                                                                Oat cake lemon drops gingerbread dessert caramels. Sweet
                                                                dessert jujubes powder sweet sesame snaps.</p>
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
                focus: '',
                name: '',
                description: '',
                permissions: [],
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
                formdata.append('focus', this.focus);
                formdata.append('name', this.name);
                formdata.append('description', this.description);

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
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;
                });
            }
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });


    });
</script>
