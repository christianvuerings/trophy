package mate.events
{
	import flash.events.Event;

	public class ChangeGlobalStateEvent extends Event
	{
		public static const CHANGEGLOBALSTATE:String = "changeGlobalStateEvent";

		// Own type of event
		public function ChangeGlobalStateEvent(type:String, bubbles:Boolean=true, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}
	}
}