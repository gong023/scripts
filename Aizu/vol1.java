public class vol1 {
	static int[] hight = {1819, 2003, 876, 2840, 1723, 1673, 3776,2848,1592,922};
	public static void main (String[] args) {
		java.util.Arrays.sort(hight);
		for(int i=hight.length-1;i>hight.length-4;i--) {
			System.out.println(hight[i]);
		}
	}
}
