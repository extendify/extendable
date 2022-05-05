import path from 'path'
import { readFiles } from './utils.mjs'
import { getRecords, updateRecord } from './airtable.mjs';

const { records } = await getRecords('styles');
const idsBySlug = {}
records.forEach(record => {
	idsBySlug[record.fields.slug] = record.id
})
readFiles('styles/', async (filename, themeJSON_CODE) => {
	const name = path.parse(filename).name;
	await updateRecord(idsBySlug[name], { themeJSON_CODE })
}, (err) => {
  throw err;
});
