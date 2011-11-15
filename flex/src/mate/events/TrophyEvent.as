package mate.events
{
	import flash.events.Event;

	public class TrophyEvent extends Event
	{
		public static const GETUSER:String = "getUserEvent";

		public function TrophyEvent(type:String, bubbles:Boolean=false, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}
	}
}