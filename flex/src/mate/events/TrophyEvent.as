package mate.events
{
	import flash.events.Event;
	public class TrophyEvent extends Event
	{
		public static const GETisloggedin:String = "getisloggedinEvent";

		// Own type of event
		public function TrophyEvent(type:String, bubbles:Boolean=true, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}
	}
}