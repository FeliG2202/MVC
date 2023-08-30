function newElement(type) {
	return document.createElement(type);
}

function getInput(id) {
	return document.getElementById(id);
}

function addEvent(ids, type, method) {
	ids.forEach(id => getInput(id).addEventListener(type, method));
}

function objectSelect(url, id, value, textContent) {
	return {
		id: id,
		value: value,
		url: url,
		textContent: textContent
	};
};

function uploadSelect(rows) {
	rows.forEach(({ url, id, value, textContent }) => {
		const select = getInput(id);

		axios.get(host + url).then(({ data }) => {
			// console.log(data);

			if (!data.status) {
				data.forEach(row => {
					const option = newElement('OPTION');
					option.value = row[value];
					option.textContent = textContent.map(value => row[value]).join(" ");
					select.appendChild(option);
				});
			}
		}).catch(err => {
			console.log(err);
		});
	});
}