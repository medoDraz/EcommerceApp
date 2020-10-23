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
                                <li class="breadcrumb-item active"> Setting
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
                                    <h4 class="card-title">Global Numbering</h4>
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
                                                    class="ft-home"></i> Global Numbering Detail </h4>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-3 ">
                                                        <h5 class="card-title m-0">Cash in receipt : </h5>
                                                    </div>
                                                    <div class="col-lg-9 ">
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio"
                                                                       name="cash_in"
                                                                       id="cashin_previous"
                                                                       class="cashin_previous"
                                                                       v-model="cash_in"
                                                                       value="previous"
                                                                       required
                                                                >
                                                                <label  for="cashin_previous" style="font-size: 12px;">Continuo with the serial
                                                                    of the previous academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">number of last issued
                                                                    receipt : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 5px;"
                                                                       class="form-control"
                                                                       placeholder="123456"
                                                                       name="cashin_previous_number"
                                                                       v-model="cashin_previous_number"
                                                                       value="123456" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio" name="cash_in" class="cashin_new" id="cashin_new" v-model="cash_in"
                                                                       value="new_serial" required>
                                                                <label style="font-size: 12px;" for="cashin_new">Generate a new serial
                                                                    for this academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">First serial number is
                                                                    : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 45px;"
                                                                       class="form-control cashin_new_number"
                                                                       placeholder=""
                                                                       name="cashin_new_number"
                                                                       v-model="cashin_new_number"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><hr>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-3 ">
                                                        <h5 class="card-title m-0">Cash out receipt : </h5>
                                                    </div>
                                                    <div class="col-lg-9 ">
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio"
                                                                       name="cash_out"
                                                                       class="cashout_previous"
                                                                       id="cashout_previous"
                                                                       v-model="cash_out"
                                                                       value="previous"
                                                                       required
                                                                >
                                                                <label style="font-size: 12px;" for="cashout_previous">Continuo with the serial
                                                                    of the previous academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">number of last issued
                                                                    receipt : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 5px;"
                                                                       class="form-control"
                                                                       placeholder="123456"
                                                                       name="cashout_previous_number"
                                                                       v-model="cashout_previous_number"
                                                                       value="123456" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio" name="cash_out" class="cashout_new" id="cashout_new" v-model="cash_out"
                                                                       value="new_serial" required>
                                                                <label style="font-size: 12px;" for="cashout_new">Generate a new serial
                                                                    for this academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">First serial number is
                                                                    : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 45px;"
                                                                       class="form-control cashout_new_number"
                                                                       placeholder=""
                                                                       v-model="cashout_new_number"
                                                                       name="cashout_new_number"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><hr>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-3 ">
                                                        <h5 class="card-title m-0">The payment voucher : </h5>
                                                    </div>
                                                    <div class="col-lg-9 ">
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio"
                                                                       name="payment"
                                                                       class="payment_previous"
                                                                       id="payment_previous"
                                                                       v-model="payment"
                                                                       value="previous"
                                                                       required
                                                                >
                                                                <label style="font-size: 12px;" for="payment_previous">Continuo with the serial
                                                                    of the previous academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">number of last issued
                                                                    receipt : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 5px;"
                                                                       class="form-control"
                                                                       placeholder="123456"
                                                                       name="pay_previous_number"
                                                                       v-model="pay_previous_number"
                                                                       value="123456" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio" name="payment" class="payment_new" id="payment_new" v-model="payment"
                                                                       value="new_serial" required>
                                                                <label style="font-size: 12px;" for="payment_new">Generate a new serial
                                                                    for this academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">First serial number is
                                                                    : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 45px;"
                                                                       class="form-control pay_new_number"
                                                                       placeholder=""
                                                                       name="pay_new_number"
                                                                       v-model="pay_new_number"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><hr>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-3 ">
                                                        <h5 class="card-title m-0">The purchase order : </h5>
                                                    </div>
                                                    <div class="col-lg-9 ">
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio"
                                                                       name="purchase"
                                                                       class="purchase_previous"
                                                                       id="purchase_previous"
                                                                       v-model="purchase"
                                                                       value="previous"
                                                                       required
                                                                >
                                                                <label style="font-size: 12px;" for="purchase_previous">Continuo with the serial
                                                                    of the previous academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">number of last issued
                                                                    receipt : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 5px;"
                                                                       class="form-control"
                                                                       placeholder="123456"
                                                                       v-model="pur_previous_number"
                                                                       name="pur_previous_number"
                                                                       value="123456" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio" name="purchase" class="purchase_new" id="purchase_new" v-model="purchase"
                                                                       value="new_serial" required>
                                                                <label style="font-size: 12px;" for="purchase_new">Generate a new serial
                                                                    for this academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">First serial number is
                                                                    : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 45px;"
                                                                       class="form-control pur_new_number"
                                                                       placeholder=""
                                                                       v-model="pur_new_number"
                                                                       name="pur_new_number"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><hr>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-3 ">
                                                        <h5 class="card-title m-0">The Journal voucher : </h5>
                                                    </div>
                                                    <div class="col-lg-9 ">
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio"
                                                                       name="journal"
                                                                       class="journal_previous"
                                                                       id="journal_previous"
                                                                       v-model="journal"
                                                                       value="previous"
                                                                       required
                                                                >
                                                                <label style="font-size: 12px;" for="journal_previous">Continuo with the serial
                                                                    of the previous academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">number of last issued
                                                                    receipt : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 5px;"
                                                                       class="form-control"
                                                                       placeholder="123456"
                                                                       v-model="journal_previous_number"
                                                                       name="journal_previous_number"
                                                                       value="123456" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio" name="journal" class="journal_new" id="journal_new" v-model="journal"
                                                                       value="new_serial" required>
                                                                <label style="font-size: 12px;" for="journal_new">Generate a new serial
                                                                    for this academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">First serial number is
                                                                    : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 45px;"
                                                                       class="form-control journal_new_number"
                                                                       placeholder=""
                                                                       v-model="journal_new_number"
                                                                       name="journal_new_number"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><hr>

                                                <div class="row pb-1 spacialrow">
                                                    <div class="col-md-3 ">
                                                        <h5 class="card-title m-0">Inventory in Inventory out : </h5>
                                                    </div>
                                                    <div class="col-lg-9 ">
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio"
                                                                       name="inventory"
                                                                       class="inventory_previous"
                                                                       id="inventory_previous"
                                                                       v-model="inventory"
                                                                       value="previous"
                                                                       required
                                                                >
                                                                <label style="font-size: 12px;" for="inventory_previous">Continuo with the serial
                                                                    of the previous academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">number of last issued
                                                                    receipt : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 5px;"
                                                                       class="form-control"
                                                                       placeholder="123456"
                                                                       v-model="inventory_previous_number"
                                                                       name="inventory_previous_number"
                                                                       value="123456" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-6 ">
                                                                <input type="radio" name="inventory" class="inventory_new" id="inventory_new" v-model="inventory"
                                                                       value="new_serial" required>
                                                                <label style="font-size: 12px;" for="inventory_new">Generate a new serial
                                                                    for this academic year</label>
                                                            </div>
                                                            <div class="col-lg-6" style="display: flex;">
                                                                <label style="font-size: 12px;">First serial number is
                                                                    : </label>
                                                                <input type="number"
                                                                       style="width: 50%; height: 20px; margin-left: 45px;"
                                                                       class="form-control inventory_new_number"
                                                                       placeholder=""
                                                                       v-model="inventory_new_number"
                                                                       name="inventory_new_number"
                                                                       value="">
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
                                                <button type="submit" class="btn btn-primary" :disabled="!isValidForm" @click.prevent="store">
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
                cash_in: '',
                cashin_previous_number: '123456',
                cashin_new_number: '',

                cash_out: '',
                cashout_previous_number: '123456',
                cashout_new_number: '',

                payment: '',
                pay_previous_number: '123456',
                pay_new_number: '',

                purchase: '',
                pur_previous_number: '123456',
                pur_new_number: '',

                journal: '',
                journal_previous_number: '123456',
                journal_new_number: '',

                inventory: '',
                inventory_previous_number: '123456',
                inventory_new_number: '',

            }
        },
        mounted() {
            console.log('Component mounted.');

        },
        computed:{
            isValidForm(){
                return this.cashin_new_number.length > 5 && this.cashout_new_number.length > 5 && this.pay_new_number.length > 5 &&
                    this.pur_new_number.length > 5 && this.journal_new_number.length > 5 && this.inventory_new_number.length > 5 ;

            }
        },
        methods: {
            store() {
                let config = {
                    headers: {"content-type": 'multipart/form-data'}
                };
                let formdata = new FormData();
                formdata.append('cash_in', this.cash_in);
                formdata.append('cashin_previous_number', this.cashin_previous_number);
                formdata.append('cashin_new_number', this.cashin_new_number);

                formdata.append('cash_out', this.cash_out);
                formdata.append('cashout_previous_number', this.cashout_previous_number);
                formdata.append('cashout_new_number', this.cashout_new_number);

                formdata.append('payment', this.payment);
                formdata.append('pay_previous_number', this.pay_previous_number);
                formdata.append('pay_new_number', this.pay_new_number);

                formdata.append('purchase', this.purchase);
                formdata.append('pur_previous_number', this.pur_previous_number);
                formdata.append('pur_new_number', this.pur_new_number);

                formdata.append('journal', this.journal);
                formdata.append('journal_previous_number', this.journal_previous_number);
                formdata.append('journal_new_number', this.journal_new_number);

                formdata.append('inventory', this.inventory);
                formdata.append('inventory_previous_number', this.inventory_previous_number);
                formdata.append('inventory_new_number', this.inventory_new_number);

                axios.post('/api/setting/global_numbering/store', formdata, config)
                    .then(res => {
                        console.log(res);

                    })
                    .catch(error =>{
                        console.log(error);
                        $('.card').append('<div class="alert alert-danger"><p>'+error+'</p></div>');
                    });

            },

        }
    }
    $(document).ready(function(){
        $('.cashin_previous').click(function(){
            $('.cashin_new_number').prop('readonly', true);
            $('.cashin_new_number').prop('required', false);
        });
        $('.cashin_new').click(function(){
            $('.cashin_new_number').prop('readonly', false);
            $('.cashin_new_number').prop('required', true);
        });
        $('.cashout_previous').click(function(){
            $('.cashout_new_number').prop('readonly', true);
            $('.cashout_new_number').prop('required', false);
        });
        $('.cashout_new').click(function(){
            $('.cashout_new_number').prop('readonly', false);
            $('.cashout_new_number').prop('required', true);
        });
        $('.payment_previous').click(function(){
            $('.pay_new_number').prop('readonly', true);
            $('.pay_new_number').prop('required', false);
        });
        $('.payment_new').click(function(){
            $('.pay_new_number').prop('readonly', false);
            $('.pay_new_number').prop('required', true);
        });
        $('.purchase_previous').click(function(){
            $('.pur_new_number').prop('readonly', true);
            $('.pur_new_number').prop('required', false);
        });
        $('.purchase_new').click(function(){
            $('.pur_new_number').prop('readonly', false);
            $('.pur_new_number').prop('required', true);
        });
        $('.journal_previous').click(function(){
            $('.journal_new_number').prop('readonly', true);
            $('.journal_new_number').prop('required', false);
        });
        $('.journal_new').click(function(){
            $('.journal_new_number').prop('readonly', false);
            $('.journal_new_number').prop('required', true);
        });
        $('.inventory_previous').click(function(){
            $('.inventory_new_number').prop('readonly', true);
            $('.inventory_new_number').prop('required', false);
        });
        $('.inventory_new').click(function(){
            $('.inventory_new_number').prop('readonly', false);
            $('.inventory_new_number').prop('required', true);
        });

    });
</script>
