package mate.events
{
	import flash.events.Event;

	public class LoginEvent extends Event
	{
		public static const LOGIN:String = "loginEvent";

		private var _email:String;
		private var _password:String;

		// Getters & Setters
		[Bindable]
		public function get password():String
		{
			return _password;
		}
		public function set password(value:String):void
		{
			_password = value;
		}

		[Bindable]
		public function get email():String
		{
			return _email;
		}
		public function set email(value:String):void
		{
			_email = value;
		}

		// Constructor
		public function LoginEvent(type:String, bubbles:Boolean=false, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}
	}
}