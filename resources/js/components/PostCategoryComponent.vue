

	<template>

		<div class = "row" v-if = "total > 0">

			<div class = "col-md-8 col-12">

				<h3><span class = "badge badge-info">{{ category.category }}</span></h3>

				<div class = "spacing-1"></div>

				<div class = "card" v-for = "post in posts" v-bind:key = "post.id">

					<img v-bind:src = "'/img/posts/' + post.image" class = "card-img-top image" alt = "post.title">

					<div class = "card-body">

						<h4 class = "card-title">{{ post.title }}</h4>

						<p class = "card-text">

							<span v-html = "post.content"></span>

						</p>

						<button class = "btn btn-primary" v-on:click = "postClick(post)">Ver resumen</button>

						<router-link v-bind:to = "{ name: 'post', params: {post_id: post.id} }" class = "btn btn-success">Ver completo</router-link>

					</div>

				</div>

				<v-pagination v-model = "currentPage" class = "mt-3"

					v-bind:page-count = "total" 
					v-bind:classes = "bootstrapPaginationClasses" 
					v-bind:labels = "paginationAnchorTexts">

				</v-pagination>

			</div>

			<post-modal v-bind:getPost = "postSelected"></post-modal>

		</div>

	</template>

	<script>

		import vPagination from 'vue-plain-pagination';

		export default {

			data() {

				return {

					postSelected: '',
			    	posts: [],
			    	category: '',
			    	currentPage: 1,
			    	total: '',
			    	bootstrapPaginationClasses: {

			    		ul: 'pagination',
			    		li: 'page-item',
			    		liActive: 'active',
			    		liDisable: 'disabled',
			    		button: 'page-link'

			    	},
			    	paginationAnchorTexts: {

			    		first: '',
			    		prev: '&laquo;',
			    		next: '&raquo;',
			    		last: ''

			    	}

			    }

			},

			created() {

				this.apiPosts();

			},

			methods: {

				postClick: function(p) {

					this.postSelected = p;

				},

				apiPosts() {

					fetch('/api/post/' + this.$route.params.category_id + '/category?page=' + this.currentPage)
					.then(response => response.json())
					.then(json => {

						this.category = json.data.category;
						this.posts = json.data.posts.data;
						this.total = json.data.posts.last_page;

					})

				}

			},

			watch: {

				currentPage: function(newVal, oldVal) {

					this.apiPosts();

				}

			},

			components: {

				vPagination

			}

		}

	</script>	

