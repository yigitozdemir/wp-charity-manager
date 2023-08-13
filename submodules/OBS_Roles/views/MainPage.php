<?php
global $wp_roles;
$roles = apply_filters( 'editable_roles', $wp_roles->roles);
//print_r($roles);
?>
<div id="app">
    <ul>
        <li v-for="role in roles">{{ role }}</li>
    </ul>

</div>

<script>
    
    const {
        createApp,
        ref
    } = Vue

    createApp({
        setup() {
            const roles = <?php echo json_encode( array_values( $roles ) ); ?>;
            return {
                roles
            }
        }
    }).mount('#app')
</script>