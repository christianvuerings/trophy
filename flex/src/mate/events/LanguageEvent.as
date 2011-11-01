package mate.events
{
	import flash.events.Event;

	public class LanguageEvent extends Event
	{
		public static const GETCOUNTRY:String = "getCountryEvent";
		public static const GETLANGUAGE:String = "getLanguageEvent";
		public static const GETLOCALE:String = "getLocaleEvent";

		public static const SETLOCALE:String = "setLocaleEvent";

		public var locale:String;

		public function LanguageEvent(type:String, bubbles:Boolean=false, cancelable:Boolean=false)
		{
			super(type, bubbles, cancelable);
		}

	}
}