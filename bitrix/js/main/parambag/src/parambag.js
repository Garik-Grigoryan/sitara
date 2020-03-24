export class ParamBag
{
	constructor(params = {})
	{
		this.params = new Map(params || {});
	}

	static create(params = {})
	{
		return new ParamBag(params);
	}

	getParam(key: string, defaultValue = null)
	{
		if (this.params.has(key))
		{
			return this.params.get(key);
		}

		return defaultValue;
	}

	setParam(key, value)
	{
		this.params.set(key, value);
	}

	clear()
	{
		this.params.clear();
	}
}