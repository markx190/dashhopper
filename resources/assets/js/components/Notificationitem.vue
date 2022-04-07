<template>
	<div class="wrap">
		<a :href="threadUrl">
			{{ unread.data.user.firstname }} commented on {{ unread.data.thread.subject }}
		
		</a>	
	</div>
</template>

<script>
    export default {
	
		props:['unread'],
			data(){
			
				return {
					threadurl:""
				
				}
			},
			
			mounted(){
			
				this.threadurl="thread/"+this.unread.data.thread.id
			}
    }
    
</script>
