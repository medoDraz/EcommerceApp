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
                                <li class="breadcrumb-item active"> Journal Voucher
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
                                    <h4 class="card-title">Add Journal Voucher</h4>
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
                                                    class="ft-home"></i> Journal Voucher Detail </h4>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">JV Type <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="JV_type" v-model="JV_type" class="form-control">
                                                            <option value="" disabled selected>Choose JV Type</option>
                                                            <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                            <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Journal Reference <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="reference"
                                                               v-model="reference"
                                                               value="">
                                                    </div>

                                                </div><hr>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Account Code <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="account_code"
                                                               v-model="account_code"
                                                               value="">
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Amount <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="amount" v-model="amount" class="form-control">
                                                            <option value="" disabled selected>Choose Amount</option>

                                                            <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                            <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                            <option class="custom-select" value="statistics" >Statistics </option>

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Debit/Credit <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="debit_credit" v-model="debit_credit" class="form-control">
                                                            <option value="" disabled selected>Choose Debit/Credit Type</option>
                                                            <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                            <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                        </select>


                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Journal description <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder=""
                                                               name="description"
                                                               v-model="description"
                                                               value="">
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Department Analysis Code <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="department_analysis_code" v-model="department_analysis_code" class="form-control">
                                                            <option value="" disabled selected>Choose Department Analysis Code</option>
                                                            <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                            <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-4 ">
                                                        <h5 class="card-title m-0">Analysis Code <span style="float: right">:</span> </h5>
                                                    </div>
                                                    <div class="col-lg-8 ">
                                                        <select name="analysis_code" v-model="analysis_code" class="form-control">
                                                            <option value="" disabled selected>Choose Analysis Code</option>
                                                            <option class="custom-select" value="balance_sheet" >Balance sheet </option>
                                                            <option class="custom-select" value="P&L" >Profit and Loss </option>
                                                        </select>
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
                JV_type: '',
                reference: '',
                account_code: '',
                amount: '',
                debit_credit: '',
                description: '',
                department_analysis_code: '',
                analysis_code: '',

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
                formdata.append('JV_type', this.JV_type);
                formdata.append('reference', this.reference);
                formdata.append('account_code', this.account_code);
                formdata.append('amount', this.amount);
                formdata.append('debit_credit', this.debit_credit);
                formdata.append('description', this.description);
                formdata.append('department_analysis_code', this.department_analysis_code);
                formdata.append('analysis_code', this.analysis_code);

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
