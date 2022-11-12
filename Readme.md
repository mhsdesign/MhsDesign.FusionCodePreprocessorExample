## MhsDesign.FusionCodePreprocessorExample

This package contains an example for a Fusion code preprocessor using the Neos 8 Parser.

It converts the following fusion:

```
@debug {
    foo = 'bar'
}
```
 
to this fusion:
```
@process.debug = Neo.Fusion:Debug {
    foo = 'bar'
}
```
 

Be warned this is just for fun.
We are not actually parsing the code, we are just replacing the string.
So this might not work for more complex cases. And will always be fragile.

For a more sophisticated preprocessor create an AstNodeVisitor,
which transforms the FusionFile Ast (the return value of ->getFusionFile()) via Flow\Around.

Or start the ObjectTreeParser again, like in neos/rector
https://github.com/neos/rector/blob/5e598022a59944790e14de2a97121e2930c8bcf1/src/Core/FusionProcessing/Helper/CustomObjectTreeParser.php#L27
