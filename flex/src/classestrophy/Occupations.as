package classestrophy
{
	[RemoteClass(alias="classestrophy.Occupations")]
	public class Occupations
	{
		private var occupationsId:Number;
		private var label:String;

		// Getters
		public function get occupationsId() {
			return this.occupationsId;
		}
		public function get label() {
			return this.label;
		}

		// Setters
		public function set occupationsId(occupationsId:Number) {
			this.occupationsId = occupationsId;
		}
		public function set label(label:String) {
			this.label = label;
		}
}