// not right

public class ch7_combination {
    private StringBuilder out = new StringBuilder();
    private final String in;

    public ch7_combination( final String str ){ in = str; }

    public void combine() { combine( 0 ); }

    private void combine(int start ){
        for( int i = start; i < in.length() - 1; ++i ){
            out.append( in.charAt(i) );
            System.out.println( out );
            combine( i + 1);
            out.setLength( out.length() - 1 );
        }
        out.append( in.charAt( in.length() - 1 ) );
        System.out.println( out );
        out.setLength( out.length() - 1 );
    }

    static public void main(String[] args) {
        ch7_combination test = new ch7_combination("abc");
        test.combine();

        /* outputs:
a
ab
abc
ac
b
bc
c

         */

    }
}