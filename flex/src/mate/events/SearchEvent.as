package mate.events
{
	import flash.events.Event;

	public class SearchEvent extends Event
	{
		public static const SUBMITSEARCH:String = "submitSearchEvent";

		private var _locationname:String;

		public function get locationname():String
		{
			return _locationname;
		}
		public function set locationname(value:String):void
		{
			_locationname = value;
		}

		public function SearchEvent(type:String, bubbles:Boolean=false, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}
	}
}