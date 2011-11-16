package mate.events
{
	import flash.events.Event;

	public class RegisterEvent extends Event
	{
		public static const REGISTER:String = "registerEvent";

		private var _user:Object;
		[Bindable]
		public function set user(user:Object):void{
			this._user = user;
		}
		public function get user():Object{
			return this._user;
		}

		public function RegisterEvent(type:String, bubbles:Boolean=false, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}
	}
}