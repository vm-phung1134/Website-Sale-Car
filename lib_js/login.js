var x=document.getElementById('login');
var y=document.getElementById('register');
var z=document.getElementById('btn');
var t=document.getElementById('admin');

		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='130px';
			t.style.left='450px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
			t.style.left='900px';
		}
		function admin()
		{
			x.style.left='-800px';
			y.style.left='-450px';
			z.style.left='270px';
			t.style.left='50px';
		}