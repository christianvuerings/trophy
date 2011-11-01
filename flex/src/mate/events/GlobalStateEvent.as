package mate.events
{
	import flash.events.Event;

	public class GlobalStateEvent extends Event
	{
		public static const CHANGEGLOBALSTATE:String = "changeGlobalStateEvent";

		public var globalstate:String = "";

		// Own type of event
		public function GlobalStateEvent(type:String, bubbles:Boolean=true, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}
	}
}