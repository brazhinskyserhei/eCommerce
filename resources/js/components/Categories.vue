<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cписок категорий</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Добавить <i
                                    class="nav-icon fa fa-book"></i></button>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Редактировать</th>
                            </tr>

                            <tr v-for="category in categories" :key="category.id">
                                <td>{{category.id}}</td>
                                <td>{{category.name}}</td>
                                <td><span class="badge bg-danger">Заблокирована</span></td>
                                <td>
                                    <a href="#"><i class="fas fa-edit cyan"></i></a>
                                    <a href="#"><i class="fas fa-trash red"></i></a>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="...">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fa fa-chevron-left"></i></span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#"><b>1</b></a></li>
                            <li class="page-item active">
					  <span class="page-link">
						2
						<span class="sr-only">(current)</span>
					  </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewH5">Добавить категорию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
					
					<form @submit.prevent="createCategory">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Название категории</label>
                            <input v-model="form.name" type="text" name="name"
                                   placeholder="Введите имя"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Статус</label>
							
							
                            <select v-model="form.status" name="status"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
                                <option value="1" selected>Активна</option>
                                <option value="0">Заблокирована</option>
                            </select>
                            <has-error :form="form" field="status"></has-error>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
					
					</form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories:{},
                form: new Form({
                    name: '',
                    status: false
                })
            }
        },
		
		methods: {

            showCategories () {
                axios.get('/api/admin/categories')
                    .then(({ data }) => { this.categories = data.data })
            },

			createCategory () {
			  this.form.post('/api/admin/categories')
				.then(({ data }) => { console.log(data) })
			}
			
		  },


        created() {
            this.showCategories();
        }
    }
</script>