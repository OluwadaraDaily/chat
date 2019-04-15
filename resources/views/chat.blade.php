<!DOCTYPE html>
<html>
	<head>
		<title> Chat App </title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

		<style type="text/css">
			.list-group{
				overflow-y: scroll;
				height: 500px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row" id="app">
				<div class="offset-4 col-4">
					<li class="list-group-item active"> Chat Room </li>

					<ul class="list-group" v-chat-scroll>
						<message 
							v-for="value,index in chat.messages" 
							:key=value.index
							color="success"
							:user = chat.user[index]
							>
						@{{ value }} 
						</message>
					</ul>

					<input type="text" class="form-control" name="message" placeholder="Type your message here..." v-model="message" @keyup.enter="send">
				</div>
			</div>
		</div>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	</body>
</html>