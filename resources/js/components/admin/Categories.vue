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
                                <li class="breadcrumb-item active"> Categories
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
                                    <h4 class="card-title">All Categories</h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr style="text-align: center;">
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Action</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr class="text-center" v-for="(category,index) in categories.data"
                                                :key="category.id">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{category. name}}</td>
                                                <td>{{category. slug}}</td>
                                                <td>


                                                    <b-dropdown id="dropdown-left" variant="outline-primary"
                                                                class="fa fa-share icon-left ">
                                                        <b-dropdown-item><a href=""
                                                                            class="px-2">
                                                            <i class="la la-eye"></i>
                                                            show</a>
                                                        </b-dropdown-item>
                                                        <b-dropdown-divider></b-dropdown-divider>
                                                        <b-dropdown-item>
                                                            <router-link :to="'/admin1/categories/edit/'+category.id"><i class="la la-edit"></i> edit</router-link>
                                                        </b-dropdown-item>
                                                        <b-dropdown-divider></b-dropdown-divider>
                                                        <b-dropdown-item>
                                                            <button type="submit" style="color: #1E9FF2;"
                                                                    class="btn btn-link delete  mr-1 ">
                                                                <i class="la la-trash"></i>
                                                                delete
                                                            </button>
                                                        </b-dropdown-item>

                                                    </b-dropdown>

                                                </td>
                                                <td>
                                                    <div class="btn-group float-md-right" role="group"
                                                         aria-label="Button group with nested dropdown">
                                                        <button
                                                            class="btn btn-outline-primary dropdown-toggle dropdown-menu-right box-shadow-2 px-2"
                                                            id="btnGroupDrop1" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i
                                                            class="ft-settings icon-left"></i>
                                                        </button>
                                                        <div class="dropdown-menu"
                                                             aria-labelledby="btnGroupDrop1">
                                                            @if (auth()->user()->hasPermission('categories_read'))
                                                            <a href=""
                                                               class="px-2">
                                                                <i class="la la-eye"></i>
                                                                @lang('site.show')
                                                            </a>
                                                            @endif

                                                            @if (auth()->user()->hasPermission('categories_update'))
                                                            <a href=""
                                                               class="px-2 ">
                                                                <i class="la la-edit"></i>
                                                                @lang('site.edit')
                                                            </a>
                                                            @endif

                                                            @if (auth()->user()->hasPermission('categories_delete'))
                                                            <form
                                                                action=""
                                                                method="post" style="display: inline-block;">
                                                                <!--                                                                {{ csrf_field() }}-->
                                                                <!--                                                                {{ method_field('delete') }}-->
                                                                <button type="submit" style="color: #1E9FF2;"
                                                                        class="btn btn-link delete px-2 mr-1 ">
                                                                    <i class="la la-trash"></i>
                                                                    @lang('site.delete')
                                                                </button>

                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
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
        name: 'Categories',
        data() {
            return {
                categories: {},
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.getPosts();
        },
        methods: {
            getPosts() {
                axios.get('/api/categories/index')
                    .then(res => {
                        console.log(res);
                        this.categories = res;
                        // localStorage.setItem('posts',JSON.stringify(this.posts));
                    })
                    .then(err => console.log(err))
            }
        }
    }
</script>
