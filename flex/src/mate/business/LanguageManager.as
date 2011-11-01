package mate.business
{

	public class LanguageManager
	{
		private var _locale:String; // Contains the current locale

		// Getters & Setters
		[Bindable]
		public function get locale():String
		{
			return _locale;
		}
		public function set locale(value:String):void
		{
			_locale = value;
		}

	}
}