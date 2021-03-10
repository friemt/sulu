// @flow
import StringBlockPreviewTransformer from '../../blockPreviewTransformers/StringBlockPreviewTransformer';

test('Return JSX for simple string', () => {
    const stringBlockPreviewTransformer = new StringBlockPreviewTransformer();
    expect(stringBlockPreviewTransformer.transform('Test')).toMatchSnapshot();
});

test('Return JSX for simple number', () => {
    const stringBlockPreviewTransformer = new StringBlockPreviewTransformer();
    expect(stringBlockPreviewTransformer.transform(1234)).toMatchSnapshot();
});

test('Return JSX for long string', () => {
    const stringBlockPreviewTransformer = new StringBlockPreviewTransformer();
    expect(stringBlockPreviewTransformer.transform('This is a very long test, which exceeds the 50 character limit'))
        .toMatchSnapshot();
});

test('Return null for object', () => {
    const stringBlockPreviewTransformer = new StringBlockPreviewTransformer();
    expect(stringBlockPreviewTransformer.transform({})).toMatchSnapshot();
});

test('Return null for array', () => {
    const stringBlockPreviewTransformer = new StringBlockPreviewTransformer();
    expect(stringBlockPreviewTransformer.transform([])).toMatchSnapshot();
});
