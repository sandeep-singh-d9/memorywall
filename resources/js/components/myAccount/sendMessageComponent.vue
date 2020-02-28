<template>
	<div>
		<div class="tab-pane mt-3">
			<h5>Send us a message</h5>
			<form @submit.prevent="submitIssue">
				<div class="col-md-6 p-0 mt-4 send_message">
					<div class="form-group">
						<label class="col-md-12 p-0">Subject<span class="color_red d-inline-block">*</span> :</label>
						<select class="form-control" v-model="subject">
							<option>Please Select</option>
							<option>Hello</option>
						</select>
					</div>
					<div class="form-group">
						<label class="col-md-12 p-0">Message<span class="color_red d-inline-block">*</span> :</label>
						<textarea class="form-control" v-model="message" rows="5"></textarea>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6 col-sm-6 text-center">
								<input type="file" class=" mt-0" @change="changeImage">
								<!-- <button class="btn canvas_btn mt-0" type="submit">Upload File</button> -->
								<span class="d-inline-block">( Upto 10 MB)</span>
							</div>
							<div class="col-md-6 col-sm-6 text-center">
								<button class="btn canvas_btn mt-0" type="submit">Send</button>
								<span class="color_red d-inline-block">*</span><span class="d-inline-block">Required Fields</span>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="col-md-12 text-left p-0 pt-2" id="message_orders">
                <table class="table color_gey">
                    <thead class="orangecolor">
                        <tr>
                            <td>Order No.</td>
                            <td>Issue No.</td>
                            <td>Details</td>
                            <td>Status</td>
                            <td>Response</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="issue in issues">
							<td>{{ issue.order_no }}</td>
							<td>{{ issue.issue_no }}</td>
							<td>{{ issue.message }}</td>
							<td>{{ issue.status }}</td>
							<td>{{ issue.response }}</td>
						</tr>
                    </tbody>
                </table>
            </div>
			<div class="text-left col-md-12">
				<a href="javascript:void(0)" class="default_btn mt-4 mb-4" style="width:auto;display: inline-block;">
					<i class="fas fa-chevron-left"></i> &nbsp;&nbsp; My Orders
				</a>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			subject : '',
            message : '',
			issues : [],
			selectedFile : '',
			order_id : ''
		}
	},
	mounted() {
		// this.getOrderDetails(this.$route.params.id)
		const id = this.$route.params.id;
		this.order_id = id
		// console.log(this.$store.state.allCartValueStore)
		this.getIssue(id)
    },
    methods: {
        getIssue(id){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
             axios.get('/api/getIssues/'+id,{                       
            }).then(response => {
                this.issues = response.data.issue
            })
		},
		changeImage (event) {
			this.selectedFile = event.target.files[0]
		},
		submitIssue(){
			const formData = new FormData()
			  formData.append('myFile', this.selectedFile)
			  formData.append('subject',this.subject)
			  formData.append('message',this.message)
			  formData.append('order_id',this.order_id)

			  axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
			 axios.post('/api/sendIssue',formData)
			 .then(response => {
				 this.issues = response.data.issue
				 this.subject = '';
				 this.message = '';
			 })
			 .catch(error => {
				 console.log(error)
			 })
		},
    },
}
</script>

<style>

</style>