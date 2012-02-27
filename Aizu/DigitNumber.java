public class DigitNumber {
	public static void main (String args[]) {
		int inputA = 5;
		int inputB = 7;
		double i = 1;
		double by = 10;
		while (i>0) {
			by = Math.pow(by,i);
			if (inputA + inputB - by < 0) {
				System.out.println(i);
				break;
			}
			i++;
		}
	}
}
