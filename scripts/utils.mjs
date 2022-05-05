import fs from 'fs'
export const readFiles = (dirname, onFileContent, onError) => {
	// https://stackoverflow.com/a/10049704/1437789
	fs.readdir(dirname, function(err, filenames) {
		if (err) {
			onError(err);
			return;
		}
		filenames.forEach(function(filename) {
			fs.readFile(dirname + filename, 'utf-8', function(err, content) {
				if (err) {
					onError(err);
					return;
				}
				onFileContent(filename, content);
			});
		});
	});
}
