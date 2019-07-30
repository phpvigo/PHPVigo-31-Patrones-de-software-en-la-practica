export default interface IItemRepository<T> {
  all (): Promise<T[]>
}
