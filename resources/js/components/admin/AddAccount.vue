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
                                <li class="breadcrumb-item active"> General Ledger GL
                                </li>
                                <li class="breadcrumb-item active"> Add Account
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
                                    <h4 class="card-title">Add Account</h4>
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
                                                    class="ft-home"></i> Account Detail </h4>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span> Account code <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               style="width: 50%;"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="code"
                                                               v-model="code"
                                                               value="">
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span> Account lookup <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               style="width: 50%;"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="lookup"
                                                               v-model="lookup"
                                                               value="">
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red"> </span> Account Description <span style="float: right">:</span> </h5>
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
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span> Account Type <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="account_type" v-model="account_type" class="form-control">
                                                            <option value="" disabled selected>Choose Type</option>

                                                            <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                            <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                            <option class="custom-select" value="statistics" >Statistics </option>

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"> Analytics Code <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <div class="row ">
                                                            <div class="col-lg-3 ">
                                                                <input type="checkbox" value="0"
                                                                       name="analytics_code"
                                                                       v-model="analytics_code"
                                                                       id="switcheryColor4"
                                                                       class="switchery analytics_code" data-color="success"
                                                                       checked/>
                                                            </div>
                                                            <div class="col-lg-9" style="display: flex;">
                                                                <select name="analytics_code1" v-model="analytics_code1" id="analytics_code1" class="form-control" style="display: none">
                                                                    <option value="" disabled selected >Choose Currency</option>

                                                                    <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                                    <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                                    <option class="custom-select" value="statistics" >Statistics </option>

                                                                </select>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span> Currency <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="currency" v-model="currency" class="form-control">
                                                            <option value="" disabled selected >Choose Currency</option>

                                                            <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                            <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                            <option class="custom-select" value="statistics" >Statistics </option>

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0"><span style="color: red">* </span> Global account “New Giza” <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               style="width: 50%;"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="global_account"
                                                               v-model="global_account"
                                                               value="">
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
                code: '',
                lookup: '',
                description: '',
                account_type: '',
                analytics_code: false,
                analytics_code1: '',
                currency: '',
                global_account: '',

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
                formdata.append('code', this.code);
                formdata.append('lookup', this.lookup);
                formdata.append('description', this.description);
                formdata.append('account_type', this.account_type);
                formdata.append('analytics_code', this.analytics_code);
                formdata.append('analytics_code1', this.analytics_code1);
                formdata.append('currency', this.currency);
                formdata.append('global_account', this.global_account);

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
        $('.switchery').change(function () {
            $('#analytics_code1').toggle();
        });


    });
</script>
