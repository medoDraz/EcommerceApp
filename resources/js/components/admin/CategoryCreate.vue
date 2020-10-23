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
                                <li class="breadcrumb-item">
                                    <router-link :to="'/admin1/categories/index'"><i class="la la-home"></i> Categories
                                    </router-link>

                                </li>
                                <li class="breadcrumb-item active">Add Category
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" id="basic-layout-form"> Add Category </h3>
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
                                            <!--                                            @csrf-->

                                            <div class="form-body">

                                                <h4 class="form-section"><i
                                                    class="ft-home"></i> Category Detail </h4>
                                                <div class="row">
                                                    <!--                                                    foreach (config('translatable.locales') as $locale){-->

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text"
                                                                   v-model="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name"
                                                                   value="">
                                                        </div>
                                                    </div>
                                                    <!--                                                    }-->
                                                    <!--                                                    @endforeach-->
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="active"
                                                               v-model="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">Active</label>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>trans('site.cancel') Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary" @click.prevent="addPost">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                name: '',
                active: '',
            }
        },
        mounted() {
            console.log('Category Create mounted.')
        },
        methods: {
            addPost() {
                let config = {
                    headers: {"content-type": 'multipart/form-data'}
                };
                let formdata = new FormData();
                formdata.append('name', this.name);
                formdata.append('active', this.active);
                axios.post('/api/categories/create', formdata, config)
                    .then(res => {
                        console.log(res);
                        this.name = '';
                    })

            }
        }
    }


</script>
