<?php

global $wp_roles;
$roles = apply_filters( 'editable_roles', $wp_roles->roles);
//print_r($roles);
?>
<div id="app">
    <h3 v-if="roles.length == 0"> No roles found </h3> 
    <ul>
        <li v-for="role in roles">{{ role.name }}</li>
    </ul>

</div>

<script>
    
    const {
        createApp,
        ref
    } = Vue

    createApp({
        setup() {
            var roles = <?php echo json_encode( array_values( $roles ) ); ?>;
            console.dir(roles);

            roles = roles.filter(aRole => aRole.name != 'Administrator');
            roles = roles.filter(aRole => aRole.name != 'Editor');
            roles = roles.filter(aRole => aRole.name != 'Author');
            roles = roles.filter(aRole => aRole.name != 'Contributor');
            roles = roles.filter(aRole => aRole.name != 'Subscriber');
            console.log(roles);
            return {
                roles
            }
        }
    }).mount('#app')
</script>