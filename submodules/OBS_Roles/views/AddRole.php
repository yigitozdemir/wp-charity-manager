<?php
    if( isset( $_POST["obs_role_name"] ) && isset( $_POST['obs_role_display_name'] ) ){
        if( wp_verify_nonce( $_REQUEST['_wpnonce'], 'add_role' ) != FALSE ){
            $role_name = $_POST["obs_role_name"];
            $role_display_name = $_POST["obs_role_display_name"];

            echo "Role name: " . $role_name . "<br>";
            echo "Role display name: " . $role_display_name ."<br>";
            $result = add_role( $role_name, $role_display_name , array('read' => true) );
            
            if( $result ){
                echo "Role " . $role_name . " has been created <br>";
            }
            else {
                echo "Role can not be created";
            }
            //echo $result;
        }
    }
?>

<div class="container-fluid" id="app">
    <div class='row'>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="POST" action="#" @submit.prevent="say" ref="form">
                <?php wp_nonce_field( 'add_role' ); ?>
                <div class="mb-3">
                    <label for="obs_role_name">Role Name:</label>
                    <input type="text" v-model='obs_role_name' class="form-control" id="obs_role_name" name="obs_role_name" placeholder="Role Name" />
                </div>
                <div class="mb-3">
                    <label for="obs_role_display_name">Role Display Name:</label>
                    <input type="text" v-model='obs_role_display_name' class="form-control" id="obs_role_display_name" name="obs_role_display_name" placeholder="Role Display Name" />
                </div>
                <button ref="submit" type="submit" class="form-control">Submit</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script>

    const {
        createApp,
        ref
    } = Vue

    createApp({
        methods: {
            say(){
                console.log("Obs role name: " + this.obs_role_name);
                console.log("Obs role display name: " + this.obs_role_display_name);
                if(this.obs_role_name == '' || this.obs_role_display_name == ''){
                    alert('Please fill the form completely');
                } else {
                    //this.$refs.form.requestSubmit();
                    //this.$refs.form.$el.submit();
                    const form = this.$refs.form;
                    form.submit();
                    //this.$refs.submit.click();
                }
            }
        },
        setup() {
            return {
                obs_role_name: '',
                obs_role_display_name: ''
            }
        }
    }).mount('#app')
</script>