export const PatientRelation = Object.freeze({
	SELF: 'self',
	FAMILY: 'family',
	FRIEND: 'friend',
	OTHER: 'other',

	labels: {
		'self': 'Yo mismo',
		'family': 'Familiar',
		'friend': 'Amigo',
		'other': 'Otro'
	}
});

export const UrgencyLevel = Object.freeze({
	LOW: 'low',
	MEDIUM: 'medium',
	HIGH: 'high',
	URGENT: 'urgent',

	// Add labels for display
	labels: {
		'low': 'Baja',
		'medium': 'Media',
		'high': 'Alta',
		'urgent': 'Urgente'
	}
});

export const enumToValue = (enumObject) => {
	return Object.entries(enumObject.labels).map(([value, text]) => ({ value, text }));
};
