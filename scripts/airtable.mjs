import fetch from 'node-fetch'
export const getRecords = async (table) => {
	const res = await fetch(`https://api.airtable.com/v0/app1XLPx5VLcilIJR/${table}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json',
			Authorization: `Bearer ${process.env.AIRTABLE_API_KEY}`,
		},
	})
	return await res.json()
}
export const updateRecord = async (id, fields) => {
	if (!id) return
	const res = await fetch(`https://api.airtable.com/v0/app1XLPx5VLcilIJR/styles/${id}`, {
		method: 'PATCH',
		headers: {
			'Content-Type': 'application/json',
			Authorization: `Bearer ${process.env.AIRTABLE_API_KEY}`,
		},
		body: JSON.stringify({ fields })
	})
	return await res.json()
}
