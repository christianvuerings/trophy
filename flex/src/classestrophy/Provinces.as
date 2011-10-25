package classestrophy
{
	[RemoteClass(alias="classestrophy.Provinces")]
	public class Provinces
	{
		private var provincesId:Number;
		private var label:String;
		private var countriesId:Number;

		// Getters
		public function get provincesId() {
			return this.provincesId;
		}
		public function get label() {
			return this.label;
		}
		public function get countriesId() {
			return this.countriesId;
		}

		// Setters
		public function set provincesId(provincesId:Number) {
			this.provincesId = provincesId;
		}
		public function set label(label:String) {
			this.label = label;
		}
		public function set countriesId(countriesId:Number) {
			this.countriesId = countriesId;
		}
}